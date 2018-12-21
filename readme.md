1. register user panel

-> users:

    1. username
    2. password
    3. email
    4. empUserId
    5. pic
    6. dob
    7. phone
    8. oauth_access_tokens (at last if access token match send data)
    
2. register apps panel

-> oauth_clients:
	
	1. empUserId 
	2. website_name 
	3. callbackurl  		(URIs beginning with "https")
	4. oauth_clients     		(client id)
	5. oauth_client_secret		(client secret)
	5. oauth_state_token  	        (state value)
      	6. grant_types                  (different use cases)
	7. access_token


// after apps register return client secret & token

3. Create login with button like:
    
    <a href="https://example-app.com/authLogin">Login with me</a>

// show this form after click:    

4. 
    <form action="{{ url('www.externalWeb.com/AuthloginCheck') }}" method="post">
       {{ csrf_field() }}
	user<input type="text" name="username">
	pass<input type="text" name="password">
	<input type="submit" name="submit">
    </form>

// pass access_token & state in compact after success login in grant page

5. In grant page:

    Do you really want to give permission this app
   
    <a href="{{ url('www.internalWeb.com/grant_permission?state=1234&access_token=34324343') }}">OK</a>
    
 4. // after grant_permission fetch website name from database
    // redirect in client app with oauth_access_tokens token , state 
    
    $access_token = $_GET['access_token'];
    return redirect("http://localhost/ClientApp/public/grantPermission?bearer_token=$oauth_access_tokens&state=1234");
    
    
 5. now in client if get data in grantPermission route,
    set header with all that value send final value:
      
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

 4. The auth server replies with an access token and expiration time
    
     {
	  "access_token":"RsT5OjbzRn430zqMLgV3Ia",
	  "expires_in":3600
     }
