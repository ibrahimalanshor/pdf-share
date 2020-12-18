<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository {

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function getOne(int $id): Object
	{
		return $this->model->with(['detail', 'files'])->withCount('files')->findOrFail($id);
	}

}

 ?>