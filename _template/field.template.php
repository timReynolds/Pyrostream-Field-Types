<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Streams Field Type
 *
 * @package   PyroStreams Field Type
 * @author    <Author>
 * @copyright Copyright (c) 2012
 * @link      <Link>
 *
 */

class Field_<FieldName>
{
	/**
	 * Required variables
	 */
	public $field_type_name = '<FieldName>';
	public $field_type_slug = '<FieldSlug>';
	public $db_col_type     = '<FieldCol>';
	
	/**
	 * Optional variables 
	 */
	public $input_is_file     = false;
	public $extra_validation  =   '';
	public $custom_parameters = array();
	public $lang              = array();
	
	/**
	 * create CI instance
	 */
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	/**
	 * Output form input
	 * Used when adding entry to stream
	 * 
	 * @param	array
	 * @param	array
	 * @return string
	 */
	public function form_output($data)
	{
		
	}
	
	/**
	* Output from the form in the view file.
	* 
	* @param	array
	* @param	array
	* @return	string
	*/
	public function pre_output($input, $data)
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
	public function pre_output_plugin($prefix, $input, $params)
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
	public function pre_save($input, $field)
	{
		
	}
	
	/**
	*
	* Called before the form is built.
	*      
	* @access public
	* @return void
	*/
	public function event()
	{
		
	}
	
	/**
	* Param Allowed Types
	*
	* @param  mixed
	* @return	string
	*/
	public function param_my_custom_one($value)
	{ 
		
	}
}

/* End of file field.<FieldName>.php */