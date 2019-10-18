import axios from 'axios';

export default {

    userSlug(username) {
        return axios.get(`/api/${username}`);
    },
};
