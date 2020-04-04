<?php

namespace Core\Activities\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class ActivityLogPresenter extends FractalPresenter {

	/**
	 * Prepare data to present
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer() {
		return new ActivityLogTransformer();
	}
}