<?php

namespace App\Controllers;

use HeadlessChromium\BrowserFactory;

class Home extends BaseController
{
    public function index()
    {   
        $data=[];
        $t = time();
       if(($this->request->getMethod(true) === 'POST') ){
  
        $browser = (new BrowserFactory()) -> createBrowser();

         
        $urlToCapture = $this->request->getVar('url');

        if( $this->request->getVar('optionType') === "png"){
            try {
            
                $page = $browser -> createPage();
                $page -> setViewport(1366, 786);
                $page -> navigate($urlToCapture) -> waitForNavigation();
             
                $screenshot = $page -> screenshot();
                $screenshot -> saveToFile(ROOTPATH."public/screenshots/".$t.".png");
                $data['res'] = $t.".png";
                $data['type'] = 'png';
            }
            catch (\Exception $ex) {
                $data['error'] = "Error occured!";
            }
            finally {
                $browser -> close();
            }
        } else {

            try {
                $page = $browser->createPage();
                $page -> setViewport(1366, 786);
                $page->navigate($urlToCapture)->waitForNavigation();
                      
                $page->pdf(['printBackground' => false])->saveToFile(ROOTPATH.'public/pdfs/'.$t.'.pdf');
                $data['res']=$t.'.pdf';
                $data['type']= 'pdf';
            } 
            catch (\Exception $ex) {
                $data['error'] = "Error occured!";
            } finally {
                $browser->close();
            }
        }

         $data['url'] = $urlToCapture;

       }
       
       return view('index',$data);
    }

}
