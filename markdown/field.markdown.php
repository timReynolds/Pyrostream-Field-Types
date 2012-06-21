<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Markdown Field Type based on 
 * <http://daringfireball.net/projects/markdown/>
 *
 * For use with PyroStreams for PyroCMS
 *
 * @package		PyroStreams Markdown Field Type
 * @author		Tim Reynolds
 * @copyright	Copyright (c) 2011, Tim Reynolds
 * @link		http://timreynolds.me
 */
 
class Field_markdown
{
	public $field_type_name     = 'Markdown';
	public $field_type_slug     = 'markdown';
	public $db_col_type         = 'longtext';
	public $custom_parameters   = array();
	public $version             = '1.0';
	
	/**
	 * Output form input
	 *
	 * @param   array
	 * @param   array
	 * @return  string
	 */
	public function form_output($data)
	{
		$options['name'] 	= $data['form_slug'];
		$options['id']		= $data['form_slug'];
		$options['value']	= $data['value'];
		
		return form_textarea( $options );
	}
	
	/**
	 * Process before outputting
	 *
	 * @access  public
	 * @param   array
	 * @return  string
	 */
	public function pre_output($input)
	{
	    $parser = new Markdown_Parser;
	    	    
	    return $parser->transform($input);
	}
}

require_once(APPPATH.'libraries/Markdown_parser.php');

/* End of file field.markdown.php */