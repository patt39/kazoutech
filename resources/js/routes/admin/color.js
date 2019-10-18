import axios from 'axios';

export default {
    colorItems(){
      return axios.get(`/api/colors`)
    },
    colorAuditing(color) {
        return axios.get(`/api/colors/auditing/${color}`);
    },
};
