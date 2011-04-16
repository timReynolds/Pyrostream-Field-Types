<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Markdown Field Type based on 
 * <http://daringfireball.net/projects/markdown/>
 *
 * PyroStreams field type
 *
 * @package		PyroStreamsField Type
 * @author		
 * @copyright           Copyright (c) 2011
 * @link		
 */

class Field_
{
    /**
     *
     * Required variables
     */
    public $field_type_name 	= '';
    public $field_type_slug	= '';
    public $db_col_type		= '';
    /**
     *
     * Optional variables 
     */
    public $input_is_file	= FALSE;
    public $extra_validation    =   '';
    public $custom_parameters	= array();
    public $lang		= array();
    
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
    function form_output($data)
    {
        
    }
    
    /**
    * Output from the form in the view file.
    * 
    * @param	array
    * @param	array
    * @return	string
    */
    function pre_output($input, $data)
    {
        
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
    function pre_output_plugin($prefix, $input, $params)
    {
        
    }
    
    /**
    * Process before saving to database
    *
    * @access	public  
    * @param	array
    * @param	obj
    * @return	string
    */
    function pre_save($input, $field)
    {
        
    }
    
    /**
    *
    * Called before the form is built.
    *      
    * @access      public
    * @return      void
    */
    function event()
    {
        
    }
    
    /**
    * Param Allowed Types
    *
    * @return	string
    */
    function param_my_custom_one($value)
    { 
        
    }    
}
/* End of file field..php */