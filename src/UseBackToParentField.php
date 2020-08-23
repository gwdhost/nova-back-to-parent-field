<?php

namespace Gwd\NovaBackToParentField;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;
use Illuminate\Support\Collection;

trait UseBackToParentField
{
    /**
     * Get the back button url from detail views.
     *
     * @return mixed
     */
    protected function getDetailBackUrl()
    {
        // Return back url here.
    }

    /**
     * Get the back button url from all views.
     *
     * @return mixed
     */
    protected function getBackUrl()
    {
        // Return back url here.
    }

    /**
     * Get the back button label from detail views.
     *
     * @return mixed
     */
    protected function getDetailBackLabel()
    {
        return __('Back');
    }

    /**
     * Get the back button label from all views.
     *
     * @return mixed
     */
    protected function getBackLabel()
    {
        return __('Back');
    }

    /**
     * Get the header right for all views.
     *
     * @return mixed
     */
    protected function getHeaderRight()
    {
        // Insert header right area.
    }

    /**
     * Prepare the resource for JSON serialization using the given fields.
     *
     * @param  \Illuminate\Support\Collection  $fields
     * @return array
     */
    protected function serializeWithId(Collection $fields)
    {
        $data = parent::serializeWithId($fields);

        return array_merge($data,[
            'backDetailUrl' => $this->getDetailBackUrl(),
            'backDetailLabel' => $this->getDetailBackLabel(),
            'backUrl' => $this->getBackUrl(),
            'backLabel' => $this->getBackLabel(),
            'backRight' => $this->getHeaderRight(),
        ]);
    }

    /**
     * Return the location to redirect the user after creation.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        if ($request->input('viaResource') && $request->input('viaResourceId')) {
            return '/resources/' . $request->input('viaResource') . '/' . $request->input('viaResourceId');
        }

        return '/resources/' . static::uriKey() . '/' . $resource->getKey();
    }

    /**
     * Return the location to redirect the user after update.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        if ($request->input('viaResource') && $request->input('viaResourceId')) {
            return '/resources/' . $request->input('viaResource') . '/' . $request->input('viaResourceId');
        }

        return '/resources/'.static::uriKey();
    }
}
