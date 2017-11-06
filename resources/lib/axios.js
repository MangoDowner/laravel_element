import axios from 'axios'
import queryString from 'query-string'

axios.defaults.timeout = 5000
axios.interceptors.request.use((config) => {
  return config;
}, (error) => {
  console.log('传参错误')
  return Promise.reject(error)
})

axios.interceptors.response.use((response) => {
  if (response.status === 200) {
    return response.data
  } else {
    console.log('网络异常')
  }
}, (error) => {
  console.log('error网络异常')
  return Promise.reject(error)
})

export default {
  post(url, data) {
    return axios({
      method: 'post',
      url,
      data: queryString.stringify(data),
      withCredentials: true,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(
      (response) => {
        return response
      }
    ).catch(
      (error) => {
        throw new Error(error)
      }
    )
  },
  get(url, params) {
    return axios({
      method: 'get',
      url,
      params,
      withCredentials: true
    }).then((response) => {
      return response
    }).catch((error) => {
      throw new Error(error)
    })
  }
}
