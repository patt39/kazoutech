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
};