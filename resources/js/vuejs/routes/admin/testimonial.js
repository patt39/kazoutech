import axios from 'axios';

export default {
    testimonialSlug(testimonial) {
        return axios.get(`/dashboard/testimonials/view/${testimonial}`);
    },
    testimonialID(id) {
        return axios.get(`/dashboard/testimonials/${id}`);
    }
};
