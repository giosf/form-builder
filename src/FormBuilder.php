<?php

namespace Giosf\FormBuilder;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Model;

class FormBuilder extends Component
{
	private $entity;
	private $view;
	private $route;
	private $method;
	private $formTitle;
	private $formFields;
	protected $formHeader;

	public function __construct(Model $entity, string $route, string $method, View|array|null $formHeader)
	{
		$this->entity = $entity;
		$this->route = $route;
		$this->method = $method;
		$this->formHeader = $formHeader;
		$this->view = $this->buildForm();
	}

	public function buildForm()
	{
		$fields = [];
		foreach ($this->formFields as $fieldName => $attributes)
		{
			if ('input' == $attributes['type'])
			{
				$fields[] = view('form-builder::input')
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
				$fields[] = view('form-builder::input-file')
					->with('label', $attributes['label'])
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName);
			}
			if ('email' == $attributes['type'])
			{
				$fields[] = view('form-builder::input-email')
					->with('value', $this->entity->$fieldName)
					->with('label', $attributes['label'])
					->with('width', $attributes['width'])
					->with('hasLabel', $attributes['hasLabel'])
					->with('fieldName', $fieldName);
			}
			if ('textarea' == $attributes['type'])
			{
				$fields[] = view('form-builder::textarea')
					->with('value', $this->entity->$fieldName)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('textareaJS' == $attributes['type'])
			{
				$fields[] = view('form-builder::textareaJS')
					->with('width', $attributes['width'])
					->with('value', $this->entity->$fieldName)
				// ->with('hideFields', null)
					// ->with('value', $value)
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('select' == $attributes['type'])
			{
				$fields[] = view('form-builder::select')
					->with('value', $this->entity->$fieldName)
					->with('options', $attributes['options'])
					->with('width', $attributes['width'])
					->with('disableIf', isset($attributes['disableIf']) ? json_encode($attributes['disableIf']) : null)
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('datalist' == $attributes['type'])
			{
				$fields[] = view('form-builder::datalist')
					->with('value', $this->entity->$fieldName)
					->with('options', $attributes['options'])
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('date' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d') : null;
				$fields[] = view('form-builder::date')
					->with('value', $value)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('datetime' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d\Th:i:s') : null;
				$fields[] = view('form-builder::datetime')
					->with('value', $value)
					->with('width', $attributes['width'])
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
			if ('switcher' == $attributes['type'])
			{
				$value = $this->entity->$fieldName ? $this->entity->$fieldName->format('Y-m-d') : null;
				$fields[] = view('form-builder::switcher')
					->with('hideFields', null)
					->with('value', $value)
					->with('fieldName', $fieldName)
					->with('attributes', $attributes);
			}
		}

		return view('form-builder::formBuilder')
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

	public function setFormFields(array $fields)
	{
		$this->formFields = $fields;
	}

	public function setFormTitle(string $title)
	{
		$this->formTitle = $formTitle;
	}
}
