1. register user
2. register apps
      -> users:

    1. username
    2. password
    3. email
    4. empUserId
    5. pic
    6. dob
    7. phone
    8. oauth_access_tokens (at last if access token match send data)
    
3. The Authorization Server:
	-> oauth_clients:
	
	1. empUserId 
	2. website_name 
	3. callbackurl  		      (URIs beginning with "https")
	4. oauth_clients     		(client id)
	5. oauth_client_secret		(client secret)
	5. oauth_refresh_token  	(send to apps after client accept request)
      	6. grant_types                (different use cases)

	
 3. After login gives a confirmation message If the user clicks "Allow," the service redirects the user back to your site 
    with an auth code
    
    https://example-app.com/cb?code=oauth_auth_codes&state=1234zyx
    
    
    code - The server returns the authorization code in the query string from oauth_auth_codes column
    state - The server returns the same state value that you passed

 4. You should first compare this state value to ensure it matches the one you started with.
    You can typically store the state value in a cookie or session, and compare it when the user comes back.
    This ensures your redirection endpoint isn't able to be tricked into attempting to exchange arbitrary authorization codes.
    
 5. if ok send this request:
    POST https://api.authorization-server.com/token
	  grant_type=authorization_code&
	  code=AUTH_CODE_HERE&
	  redirect_uri=REDIRECT_URI&
	  client_id=CLIENT_ID&
	  client_secret=CLIENT_SECRET
	  

	
    grant_type		= authorization_code - The grant type for this flow is authorization_code
    code		= AUTH_CODE_HERE - This is the code you received in the query string
    redirect_uri	= REDIRECT_URI - Must be identical to the redirect URI provided in the original link
    client_id		= CLIENT_ID - The client ID you received when you first created the application
    client_secret	= CLIENT_SECRET - Since this request is made from server-side code, the secret is included

 4. The server replies with an access token and expiration time
    
     {
	  "access_token":"RsT5OjbzRn430zqMLgV3Ia",
	  "expires_in":3600
     }
