<?php

namespace Core\User\Repositories\Eloquent;

use Core\Repository\Eloquent\BaseRepository;
use Core\User\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */
    public function boot()
    {
        $this->fieldSearchable = config('users.user.model.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $provider = config('auth.guards.' . getenv('guard') . '.web.provider', 'users');

        return config("auth.providers.$provider.model", App\User::class);
    }

    /**
     * Attach a user to a team.
     *
     * @return string
     */
    function switch ($data) {
            $user = $this->model->find($data['user_id']);
            $user->team_id = $data['team_id'];
            $user->save();
            return $user;
    }

    /**
     * List of users for select.
     *
     * @return string
     */
    public function select($q = '', $count = 25, $key = 'id', $name = 'name')
    {
        return $this->model
            ->where('name', 'like', '%' . $q . '%')
            ->select("$name as name", "$key as key")
            ->take($count)
            ->get();
    }

    public function getUserByRole()
    {
        $users = $this->model->select('name', 'id as key')->get();
        return $this->encriptArray($users, 'key');
    }

    private function encriptArray($array, $field)
    {
        $arrayToEncript = collect($array->toArray());
        $encriptedArray = $arrayToEncript->map(function ($item, $key) use ($field) {
            $item[$field] = hashids_encode($item[$field]);
            return $item;
        });
        return $encriptedArray;
    }
    public function userIdByName($name)
    {
        return $this->model
            ->where('name', 'like', '%' . $name . '%')
            ->pluck("id")->first();
    }
}
