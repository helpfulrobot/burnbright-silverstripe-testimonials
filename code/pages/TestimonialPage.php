<?php

class TestimonialPage extends Page {

    public function Testimonials() {
        return Testimonial::get("Testimonial", array("Approved" => 1))->sort("SortOrder");
    }

}

class TestimonialPage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'TestimonialForm'
    );

    public function TestimonialForm() {
        $fields = new FieldList(array(
            TextField::create('Author', 'Your Name'),
            TextareaField::create('Content', 'Your testimonial')
        ));

        $actions = new FieldList(FormAction::create("submitTestimonial")
                        ->setUseButtonTag(true)
                        ->setTitle("Send")
                        ->setAttribute("data-style", "expand-left")
                        ->addExtraClass("ladda-button"));
        $form    = new Form($this, 'TestimonialForm', $fields, $actions);
        $this->extend("updateForm", $form);
        return $form;
    }

    public function submitTestimonial($data, Form $form) {
        $filters     = array
            (
            "Author"  => FILTER_SANITIZE_STRING,
            "Content" => FILTER_SANITIZE_STRING
        );
        $dataFilterd = filter_var_array($data, $filters);
        if (!$dataFilterd["Author"]) {
            $form->addErrorMessage('Author', 'Please enter a valid name', 'bad');
        }
        if (!$dataFilterd["Content"]) {
            $form->addErrorMessage('Content', 'Please enter your testimonial', 'bad');
        }
        return $this->redirectBack();
    }

}
