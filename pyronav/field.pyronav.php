<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * PyroStreams pyroNav field type
 *
 * @package		PyroStreams navigation Field Type
 * @author		Tim Reynolds
 * @copyright           Copyright (c) 2011
 * @link		timreynolds.me
 */

class Field_pyronav
{
    /**
     *
     * Required variables
     */
    public $field_type_name 	= 'PyroNav';
    public $field_type_slug	= 'pyronav';
    public $db_col_type		= 'int';
    /**
     *
     * Optional variables 
     */
    public $custom_parameters	= array('navigation_group');
    public $lang		= array(
        'en' => array(
            'navigation_group' => 'Navigation Group',
            'Dead Link'        => 'This link no longer exists'
        ));
    
    /**
     * create CI instance
     */
    function __construct()
    {
	$this->CI =& get_instance();
    }
    
    /**
     * Output form input
     * Used when adding entry to stream
     * 
     * @param	array
     * @param	array
     * @return	string
     */
    function form_output( $data )
    {
        $options = array();
        $nav = array();
        $this->CI->load->model('navigation/navigation_m');
        
        if ($data['custom']['navigation_group'] != 0)
	{
            $nav = $this->CI->navigation_m
                ->get_links(array(
                    'group' => $data['custom']['navigation_group']
                    ));
	}else{
            $nav = $this->CI->navigation_m->get_links();
	}

        foreach ($nav as $item)
	{
            $options[$item->id] = $item->title;
	}
		
	return form_dropdown($data['form_slug'], $options);
    }
    
    /**
    * Output from the form in the view file.
    * 
    * @param	array
    * @param	array
    * @return	string
    */
    function pre_output( $input, $data )
    {
        $attributes = array();
        $nav_item = '';
        
        $this->CI->load->model('navigation/navigation_m');
        $nav_item = $this->CI->navigation_m->get_link($input);
        
        if (!empty($nav_item))
        {
            // Create the url for the link type
            $nav_item = $this->make_url($nav_item);
            $attributes = $this->generate_nav_attributes($nav_item);
        
            return anchor($nav_item->url, $nav_item->title, $attributes);
        } else
        {
            return anchor(site_url('admin/navigation'),'This link no longer exists');
        }
  
    }
    
    /**
    * Process before outputting for the plugin
    *
    * This creates an array of data to be merged with the
    * tag array so relationship data can be called with
    * a {field.column} syntax
    *
    * @access	public
    * @param	string
    * @param	string
    * @param	array
    * @return	array
    */
    function pre_output_plugin( $prefix, $input, $params )
    {
        $nav_data = array();
        $attributes = array();
        $nav_item = '';
        
        $this->CI->load->model('navigation/navigation_m');
        $nav_item = $this->CI->navigation_m->get_link($input);
        
        if (!empty($nav_item))
        {
            // Create the url for the link type
            $nav_item = $this->make_url($nav_item);
            $attributes = $this->generate_nav_attributes($nav_item);
        
            $nav_data[substr($prefix, 0, -1)]           = anchor($nav_item->url, $nav_item->title, $attributes);
            $nav_data[$prefix.'id']                     = $nav_item->id;
            $nav_data[$prefix.'title']                  = $nav_item->title;
            $nav_data[$prefix.'parent']                 = $nav_item->parent;
            $nav_data[$prefix.'has_kids']               = $nav_item->has_kids;
            $nav_data[$prefix.'link_type']              = $nav_item->link_type;
            $nav_data[$prefix.'page_id']                = $nav_item->page_id;
            $nav_data[$prefix.'module_name']            = $nav_item->module_name;
            $nav_data[$prefix.'url']                    = $nav_item->url;
            $nav_data[$prefix.'uri']                    = $nav_item->uri;
            $nav_data[$prefix.'navigation_group_id']    = $nav_item->navigation_group_id;
            $nav_data[$prefix.'position']               = $nav_item->position;
            $nav_data[$prefix.'target']                 = $nav_item->target;
            $nav_data[$prefix.'class']                  = $nav_item->class;
        } else {
            //if the link has been deleted
            // set everything to blank
            $nav_data[substr($prefix, 0, -1)]           = '';
            $nav_data[$prefix.'id']                     = '';
            $nav_data[$prefix.'title']                  = '';
            $nav_data[$prefix.'parent']                 = '';
            $nav_data[$prefix.'has_kids']               = '';
            $nav_data[$prefix.'link_type']              = '';
            $nav_data[$prefix.'page_id']                = '';
            $nav_data[$prefix.'module_name']            = '';
            $nav_data[$prefix.'url']                    = '';
            $nav_data[$prefix.'uri']                    = '';
            $nav_data[$prefix.'navigation_group_id']    = '';
            $nav_data[$prefix.'position']               = '';
            $nav_data[$prefix.'target']                 = '';
            $nav_data[$prefix.'class']                  = '';
            
        }
        
        
        return $nav_data;
    }
    
    /**
    * Param Allowed Types
    *
    * @return	string
    */
    function param_navigation_group( $value = '' )
    { 
        $options = array();
        $navigation_group = array();
        
        $this->CI->load->model('navigation/navigation_m');
        $navigation_group = $this->CI->navigation_m->get_groups();
        
        
        $options[0] = "None";
	foreach ($navigation_group as $item)
	{
	    $options[$item->id] = $item->title;
	}
	 
	return form_dropdown('navigation_group',$options,$value);
    } 
        
    /**
    * Determine the url from the link_type 
    *
    * @access	private
    * @param	object
    * @return	array
    */
    private function make_url( $nav_item )
    {
        
        switch($nav_item->link_type)
        {
            case 'uri':
                $nav_item->url = site_url($nav_item->url);
            break;
            case 'module':
                $nav_item->url = site_url($nav_item->module_name);
            break;
            case 'page':
                $this->CI->load->model('pages/pages_m');
                $page = $this->CI->pages_m->get($nav_item->page_id);
                $nav_item->url = $page ? site_url($nav_item->uri) : '';
            break;
        }
        
        return $nav_item;
    }
    
    /**
    * Process naviagtion attributes 
    *
    * @access	private
    * @param	object
    * @return	array
    */
    private function generate_nav_attributes( $nav_item )
    {
        $attributes = array();
        $attributes['target'] = $nav_item->target;
	$attributes['class'] = $nav_item->class;
        return $attributes;
    }
}
/* End of file field.pyronav.php */