<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scenario;

class FormBuilder extends Component
{
	private $entity;
	private $view;
	private $route;
	private $method;
	private $formTitle;
	protected $formHeader;

	public function __construct(Model $entity, string $route, string $method, View|array|null $formHeader, ?string $formTitle = '', ?array $formFields = null)
	{
		$this->entity = $entity;
		$this->route = $route;
		$this->method = $method;
		$fieldsData = method_exists($this->entity, 'getFormFields') ? $this->entity->getFormFields() : $formFields;
		$this->formHeader = $formHeader;
		$this->formTitle = $formTitle;
		$this->view = $this->buildForm($fieldsData);
	}

	public function buildForm(array $formFields)
	{
		$fields = [];
		foreach ($formFields as $fieldName => $attributes)
		{
			if ('input' == $attributes['type'])
			{
				$fields[] = view('formBuilder.input')
					->with('value', $this->entity->$fieldName)
					->with('label', $attributes['label'])
					->with('width', $attributes['width'])
					->with('hasLabel', true)
					->with('fieldName', $fieldName)
					->with('disabled', isset($attributes['disabled']) ? $attributes['disabled'] : null)
					->with('attributes', $attributes);
			}
			if ('inputfile' == $attributes['type'])
			{
				$fields[] = view('formBuilder.input-file')
					->with('label', $attributes['label'])
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName);
			}
			if ('email' == $attributes['type'])
			{
				$fields[] = view('formBuilder.input-email')
					->with('value', $this->entity->$fieldName)
					->with('label', $attributes['label'])
					->with('width', $attributes['width'])
					->with('hasLabel', $attributes['hasLabel'])
					->with('fieldName', $fieldName);
			}
			if ('textarea' == $attributes['type'])
			{
				$fields[] = view('formBuilder.textarea')
					->with('value', $this->entity->$fieldName)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('textareaJS' == $attributes['type'])
			{
				$fields[] = view('formBuilder.textareaJS')
					->with('width', $attributes['width'])
				// ->with('hideFields', null)
					// ->with('value', $value)
					// ->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('select' == $attributes['type'])
			{
				$fields[] = view('formBuilder.select')
					->with('value', $this->entity->$fieldName)
					->with('options', $attributes['options'])
					->with('width', $attributes['width'])
					->with('disableIf', isset($attributes['disableIf']) ? json_encode($attributes['disableIf']) : null)
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('datalist' == $attributes['type'])
			{
				$fields[] = view('formBuilder.datalist')
					->with('value', $this->entity->$fieldName)
					->with('options', $attributes['options'])
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('date' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d') : null;
				$fields[] = view('formBuilder.date')
					->with('value', $value)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('datetime' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d\Th:i:s') : null;
				$fields[] = view('formBuilder.datetime')
					->with('value', $value)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('switcher' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d') : null;
				$fields[] = view('formBuilder.switcher')
					->with('hideFields', null)
					->with('value', $value)
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
		}

		return view('formBuilder.formBuilder')
			->with('entity', $this->entity)
			->with('formHeader', isset($this->formHeader) ? $this->formHeader : null)
			->with('fields', $fields)
			->with('route', $this->route)
			->with('formTitle', $this->formTitle)
			->with('method', $this->method);
	}

	public function render()
	{
		return $this->view->render();
	}
}
