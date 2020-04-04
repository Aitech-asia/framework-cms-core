<?php

namespace Core\Activities\Repositories\Eloquent;

use Core\Activities\Interfaces\ActivityLogRepositoryInterface;
use Core\Repository\Eloquent\BaseRepository;

class ActivityLogRepository extends BaseRepository implements ActivityLogRepositoryInterface {

	public function boot() {

	}

	/**
	 * Specify Model class name.
	 *
	 * @return string
	 */
	public function model() {
		return config('activitylog.activity_model');
	}
}
