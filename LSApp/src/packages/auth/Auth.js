//our custom package for user authentication using laravel passport tokens
export default function (Vue) {
    //authentication object with authentication methods
    Vue.auth = {
        //get access token and expiration date from oauth token that we got when we authenticated user
        //and store them in browser aka localStorage
        setToken: (token, expiration) => {
            localStorage.setItem('token', token)
            localStorage.setItem('expiration', expiration)
        },
        //get token if exists or if its not expired
        getToken: () => {
            var token = localStorage.getItem('token')
            var expiration = localStorage.getItem('expiration')

            if ( !token || !expiration)
                return null

            if (Date.now() > parseInt(expiration)) {
                this.destroyToken()
                return null
            }
            else
                return token
        },
        //delete token from browser memory when you log out or when token is expired
        destroyToken: () => {
            localStorage.removeItem('token')
            localStorage.removeItem('expiration')
        },
        //check if user is authenticated
        isAuthenticated: () => {
            if(this.getToken())
                return true
            else
                return false
        }
    }

    //return Vue.auth objeck when $auth is called somewhere
    Object.defineProperties(Vue.prototype , {
        $auth: {
            get: () => {
                return Vue.auth
            }
        }
    })
}