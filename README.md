# codeigniter-recaptcha

A Codeigniter library to validate Google Recaptcha.

## Getting Started

You need to copy config and library files into yout Codeiginter application.

### How to use

01. Set config variables ( Google recaptcha sitekey and secret. You will be aboe to get those values form https://www.google.com/recaptcha/admin ).

02. Use the library in your controllers as below  

```php
<?php

class Form extends CI_Controller {

  /**
   * Index Controller
   *
   * @return void
   */
    public function index()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha', 'trim|required|callback_validateCaptcha');

        if ($this->form_validation->run() == FALSE){
            //Form Error
        }
        else{
            //Form Success
        }
    }

    /**
     * A callback function for validate captcha
     *
     * @param string $response
     * @return boolean
     */
    public function validateCaptcha($response){

      $this->load->library('recaptcha');
      
      if (!$this->recaptcha->Validate($response)){
          $this->form_validation->set_message('validateCaptcha', 'The {field} field is incorrect. Please retry.');
          return FALSE;
      }
      
      return TRUE;
}

```



## Authors

* **H.M.S.Nishantha** - *srimaln91@gmail.com*
* (https://github.com/srimaln91)



## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

