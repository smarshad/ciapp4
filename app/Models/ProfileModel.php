<?php  
namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model{
	
	protected $table = 'profiles';
	protected $DBGroup = 'default';
	// protected $primaryKey = 'user_id';
	protected $allowedFields = ['user_id', 'first_name', 'last_name', 'country', 'state', 'city', 'address','gender', 'zipcode'];
	protected $useTimestamps =  true;
	protected $validationRules    = [
		'first_name' => 'required|min_length[3]',
		'last_name'  => 'required|min_length[3]',
		'gender'  => 'required|min_length[3]',
        'user_id'    => 'required|is_unique[profiles.user_id]'
    ];
	protected $validationMessages = [];


}
