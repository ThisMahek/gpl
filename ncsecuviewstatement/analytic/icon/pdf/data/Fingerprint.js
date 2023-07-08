function initFingerprintJS() {

    try {

        FingerprintJS.load().then(fp => {

            // The FingerprintJS agent is ready.
            // Get a visitor identifier when you'd like to.
            fp.get().then(result => {

                // This is the visitor identifier:
                const visitorId = result.visitorId;
                console.log(visitorId);

                const test = result;
                console.log(test);

                var is_safari = navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1 &&  navigator.userAgent.indexOf('Android') == -1;
                console.log("is_safari: " + is_safari);

                var devicePlatform = result.components.platform.value;
                console.log("devicePlatform: " + devicePlatform);
                
                //Platform Values:
                //iPhone : iPhone
                //Android : Linux i(xxx) OR Linux armv(xx)
                //Tablet : Linux
                //iPad : Safari, FireFox - MacIntel; Chrome, DuckDuckGo - iPad
                var platformMatch = devicePlatform.indexOf('iPhone') != -1 || devicePlatform.indexOf('Linux') != -1 
                                    || devicePlatform.indexOf('MacIntel') != -1|| devicePlatform.indexOf('iPad') != -1;
                console.log("platformMatch: " + platformMatch);

                var platformCookie = devicePlatform;
                if (!platformMatch)
                {
                    platformCookie = "Windows";
                }
                console.log("platformCookie: " + platformCookie);

                document.cookie = "platform=" + platformCookie;

            }); // fp.get().then(result => {

        }); //FingerprintJS.load().then(fp => {

    }
    catch(err) {

        console.log("Error getting platform: " + err.message);
    }

} //function