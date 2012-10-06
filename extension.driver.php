<?php

    class extension_cookie_law extends Extension {
    
    	/*-------------------------------------------------------------------------
    		Delegate
    	-------------------------------------------------------------------------*/
    
    	public function getSubscribedDelegates() {
    		return array(
				array(
                    'page' => '/frontend/',
                    'delegate' => 'FrontendParamsResolve',
                    'callback' => 'frontendParamsResolve'
                )
    		);
    	}
    
    	/*-------------------------------------------------------------------------
    		Delegated functions
    	-------------------------------------------------------------------------*/	
    
		public function frontendParamsResolve($context) {
            $cookie = new Cookie('eu-cookie-law', YEAR, __SYM_COOKIE_PATH__, null, true);
            $accept = $cookie->get('accept');

            $context["params"]["allowCookies"] = ($accept) ? 'true' : 'false';
		}

        /*-------------------------------------------------------------------------
            Private functions
        -------------------------------------------------------------------------*/ 
    }
?>