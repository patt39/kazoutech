import axios from 'axios';

export default {
    faqID(id) {
        return axios.get(`/dashboard/faqs/${id}`);
    },
    faqByCatagory(categoryfaq) {
        return axios.get(`/api/faqs/c/${categoryfaq}`);
    },
};
