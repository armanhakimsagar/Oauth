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
4. 
