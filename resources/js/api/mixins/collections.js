import axios from 'axios';

export default {

    userShow(username) {
        return axios.get(`/api/dashboard/profile/${username}`);
    },
    userID(id) {
        return axios.get(`/dashboard/users/${id}`);
    },
    category(id) {
        return axios.get(`/dashboard/categories/${id}`);
    },
    /* Ici c'est pour voir l'info avec l'id elle va avec
    public function show()
    {}
    dans le controller
    */
    tag(id) {
        return axios.get(`/dashboard/tags/${id}`);
    },
    /* Ici c'est pour recuper un produit */
    tagView(tag) {
        return axios.get(`/dashboard/tags/api/${tag}`);
    },

    contactshow(contact) {
        return axios.get(`/dashboard/contacts/view/${contact}`);
    },

    aboutID(id) {
        return axios.get(`/dashboard/abouts/${id}`);
    },
    faqID(id) {
        return axios.get(`/dashboard/faqs/${id}`);
    },
    messageshow(message) {
        return axios.get(`/dashboard/messages/view/${message}`);
    },
    tasksbyuser(username) {
        return axios.get(`/api/dashboard/tasks/u/${username}`);
    },
    technicianID(id) {
        return axios.get(`/dashboard/technicians/${id}`);
    },
    technicianSlug(technician) {
        return axios.get(`/dashboard/technicians/j/${technician}`);
    },
    technicianCity(city) {
        return axios.get(`/api/technicians/c/${city}`);
    },
    technicianOccupation(occupation) {
        return axios.get(`/api/technicians/o/${occupation}`);
    },
    followerUsername(username) {
        return axios.get(`/followers/${username}`);
    },
    followingUsername(username) {
        return axios.get(`/followings/${username}`);
    },
    testimonialSlug(testimonial) {
        return axios.get(`/dashboard/testimonials/view/${testimonial}`);
    },
    testimonialID(id) {
        return axios.get(`/dashboard/testimonials/${id}`);
    }
};