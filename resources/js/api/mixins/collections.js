import axios from 'axios';

export default {

    user(username) {
        return axios.get(`/api/dashboard/profile/${username}`);
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
    tagview(tag) {
        return axios.get(`/dashboard/tags/api/${tag}`);
    },

    contactshow(contact) {
        return axios.get(`/dashboard/contacts/view/${contact}`);
    },
    userID(id) {
        return axios.get(`/dashboard/users/${id}`);
    },

    aboutID(id) {
        return axios.get(`/dashboard/abouts/${id}`);
    },
    userUsername(username) {
        return axios.get(`/users/profile/${username}`);
    },
    faqID(id) {
        return axios.get(`/dashboard/faqs/${id}`);
    },
    messageshow(message) {
        return axios.get(`/dashboard/messages/view/${message}`);
    },
    tasksbyuser(username) {
        return axios.get(`/api/tasks/u/${username}`);
    },
};