import axios from 'axios';

export default {

    userUsername(username) {
        return axios.get(`/api/${username}`);
    },
};
