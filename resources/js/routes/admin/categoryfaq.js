import axios from 'axios';

export default {

    categoryfaq() {
        return axios.get(`/api/categoryfaqs`);
    },

    categoryfaqbystatus() {
        return axios.get(`/api/category-faqs-by-faq`);
    },
};
