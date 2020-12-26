export default {
    id: null,
    name: null,
    email: null,
    phone: null,
    accessToken: null,
    isAuth() {
        this.load()
        return this.accessToken !== null
    },
    login(data) {
        localStorage.setItem('user', JSON.stringify(data))
        this.id = data.id
        this.name = data.name
        this.email = data.email
        this.phone = data.phone
        this.accessToken = data.accessToken
    },
    logout() {
        localStorage.removeItem('user')
        this.id = null
        this.name = null
        this.email = null
        this.phone = null
        this.accessToken = null
    },
    load() {
        let data = localStorage.getItem('user')
        if (data !== null && data !== '') {
            data = JSON.parse(data)
            this.id = data.id
            this.name = data.name
            this.email = data.email
            this.phone = data.phone
            this.accessToken = data.accessToken
        }
    }
}
