<?php declare(strict_types=1);

namespace InteractionDesignFoundation\Postmark\Api\Template;

use GuzzleHttp\RequestOptions;
use InteractionDesignFoundation\Postmark\Api\Api;
use InteractionDesignFoundation\Postmark\Api\Template\Requests\Template as TemplateRequest;
use InteractionDesignFoundation\Postmark\Contracts\ApiResponse;
use InteractionDesignFoundation\Postmark\Contracts\TemplateApi;
use InteractionDesignFoundation\Postmark\Responses\Template\ShowResponse;
use InteractionDesignFoundation\Postmark\Responses\Template\IndexResponse;
use InteractionDesignFoundation\Postmark\Responses\Template\DeletedResponse;
use InteractionDesignFoundation\Postmark\Responses\Template\CreateResponse;

final class Template extends Api implements TemplateApi
{
    /**
     * Create a new template with the given data.
     */
    public function create(TemplateRequest $template): ApiResponse
    {
        return $this->request('POST', '/templates', CreateResponse::class, [
            RequestOptions::BODY => $template->toJson(),
        ]);
    }

    /**
     * Search for a specific template via ID or Alias.
     */
    public function find(string $templateIdOrAlias): ApiResponse
    {
        return $this->request('GET', "/templates/$templateIdOrAlias",ShowResponse::class);
    }

    /**
     * Fetch all templates.
     */
    public function all(): ApiResponse
    {
        return $this->request('GET', '/templates', IndexResponse::class);
    }

    /**
     * Delete the given template.
     */
    public function delete(string $templateIdOrAlias): ApiResponse
    {
        return $this->request('DELETE', "/templates/$templateIdOrAlias", DeletedResponse::class);
    }
}
