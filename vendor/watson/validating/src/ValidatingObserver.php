<?php namespace Watson\Validating;

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Event;
use \Watson\Validating\ValidationException;

class ValidatingObserver {

    /**
     * Register the validation event for creating the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function creating(Model $model)
    {
        if ($model->getRuleset('creating'))
        {
            return $this->performValidation($model, 'creating');
        }
    }

    /**
     * Register the validation event for updating the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function updating(Model $model)
    {
        if ($model->getRuleset('updating'))
        {
            return $this->performValidation($model, 'updating');
        }
    }

    /**
     * Register the validation event for saving the model. Saving validation
     * should only occur if creating and updating validation does not.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function saving(Model $model)
    {
        if ( ! $model->getRuleset('creating') && ! $model->getRuleset('updating'))
        {
            return $this->performValidation($model, 'saving');
        }
    }

    /**
     * Register the validation event for deleting the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function deleting(Model $model)
    {
        if ($model->getRuleset('deleting'))
        {
            return $this->performValidation($model, 'deleting');
        }
    }

    /**
     * Register the validation event for restoring the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function restoring(Model $model)
    {
        if ($model->getRuleset('restoring'))
        {
            return $this->performValidation($model, 'restoring');
        }
    }

    /**
     * Perform validation with the specified ruleset.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $event
     * @return boolean
     */
    protected function performValidation(Model $model, $event)
    {
        // If the model has validating enabled, perform it.
        if ($model->getValidating())
        {
            // Fire the namespaced validating event and prevent validation
            // if it returns a value.
            if ($this->fireValidatingEvent($model, $event) !== null) return;

            if ($model->isValid($event) === false)
            {
                // Fire the validating.failed event.
                $this->fireValidatedEvent($model, 'failed');

                if ($model->getThrowValidationExceptions())
                {
                    $model->throwValidationException();
                }

                return false;
            }
            // Fire the validating.passed event.
            $this->fireValidatedEvent($model, 'passed');
        }
        else
        {
            $this->fireValidatedEvent($model, 'skipped');
        }
    }

    /**
     * Fire the namespaced validating event.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $event
     * @return mixed
     */
    protected function fireValidatingEvent(Model $model, $event)
    {
        return Event::until("eloquent.validating: ".get_class($model), [$model, $event]);
    }

    /**
     * Fire the namespaced post-validation event.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $status
     * @return void
     */
    protected function fireValidatedEvent(Model $model, $status)
    {
        Event::fire("eloquent.validated: ".get_class($model), [$model, $status]);
    }

}
