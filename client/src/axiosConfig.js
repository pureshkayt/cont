import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://localhost/contact-book/server'
});

export default instance;
