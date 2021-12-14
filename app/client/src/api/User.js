import axios from 'axios'

class User
{
    static serverPath = 'http://martins-balcuns.magebithr.com/api'

    static get(data)
    {
        return axios.get(`${this.serverPath}/user`, { params: data}).catch(error =>{
            console.log(error)
        })
    }

    static add(data)
    {
        return axios.post(`${this.serverPath}/user`, { data: data}).catch(error =>{
            console.log(error)
        })
    }

    static delete(data)
    {
        return axios.delete(`${this.serverPath}/user`, { data: data}).catch(error =>{
            console.log(error)
        })
    }
}

export default User