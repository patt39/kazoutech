import axios from 'axios';

export default {
    colorAuditing(color) {
        return axios.get(`/api/colors/auditing/${color}`);
    },
};
