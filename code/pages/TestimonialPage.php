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

        $actions = new FieldList(
                FormAction::create("submitTestimonial")->setTitle("Send")
        );

        $required = new RequiredFields('Name');

        $form = new Form($this, 'TestimonialForm', $fields, $actions, $required);
        if (class_exists("NocaptchaField")) {
            $spamField = $form
                    ->enableSpamProtection()
                    ->fields()
                    ->fieldByName('Captcha');
            if ($spamField) {
                $spamField->setTitle("Spam protection");
            }
        }
        return $form;
    }

    public function submitTestimonial($data, Form $form) {
        $form->sessionMessage('Hello ' . $data['Author'], 'success');
        return $this->redirectBack();
    }

}
