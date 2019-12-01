import axios from 'axios';

export default {
    faqsByStatus() {
        return axios.get(`/api/faqs/sites`);
    },
    faqID(id) {
        return axios.get(`/dashboard/faqs/${id}`);
    },
    faqByCatagory(categoryfaq) {
        return axios.get(`/api/faqs/c/${categoryfaq}`);
    },
    faqByCatagoryStatus(categoryfaq) {
        return axios.get(`/api/faqs/sites/c/${categoryfaq}`);
    },
    categoryfaqbystatus() {
        return axios.get(`/api/category-faqs-by-faq`);
    },
};
