import DashboardIndex from "../components/admin/DashboardIndex";
import AdminProfileEdit from "../components/admin/account/AdminProfileEdit";
import ColorIndex from "../components/admin/partial/settings/color/ColorIndex";
import CountriesIndex from "../components/admin/partial/settings/country/CountriesIndex";
import AdminChangePassword from "../components/admin/account/AdminChangePassword";
import CategoryIndex from "../components/admin/partial/category/site/CategoryIndex";
import CategoryCreate from "../components/admin/partial/category/site/CategoryCreate";
import CategoryEdit from "../components/admin/partial/category/site/CategoryEdit";
import ContactIndex from "../components/admin/contact/ContactIndex";
import ContactMessageShow from "../components/admin/contact/ContactMessageShow";
import TagIndex from "../components/admin/partial/tag/TagIndex";
import TagCreate from "../components/admin/partial/tag/TagCreate";
import TagEdit from "../components/admin/partial/tag/TagEdit";
import TagView from "../components/admin/partial/tag/TagView";
import UserIndex from "../components/admin/user/UserIndex";
import UserEdit from "../components/admin/user/UserEdit";
import MessageIndex from "../components/admin/user/message/MessageIndex";
import MessageSend from "../components/admin/user/message/MessageSend";
import MessageView from "../components/admin/user/message/MessageView";
import OccupationIndex from "../components/admin/occupation/occupation/OccupationIndex";
import CategoryFaqIndex from "../components/admin/faq/admin/CategoryFaqIndex";
import FaqIndex from "../components/admin/faq/admin/FaqIndex";
import FaqCreate from "../components/admin/faq/admin/FaqCreate";
import FaqEdit from "../components/admin/faq/admin/FaqEdit";
import AdministratorIndex from "../components/admin/administrator/AdministratorIndex";
import AdministratorDatatableIndex from "../components/admin/administrator/AdministratorDatatableIndex";
import AdministratorEdit from "../components/admin/administrator/AdministratorEdit";
import CityIndex from "../components/admin/partial/settings/city/CityIndex";
import PermissionIndex from "../components/admin/permission/PermissionIndex";
import NoteIndex from "../components/admin/partial/note/NoteIndex";
import TaskIndex from "../components/admin/partial/task/TaskIndex";
import TaskUser from "../components/admin/partial/task/TaskUser";
import RoleIndex from "../components/admin/role/RoleIndex";
import AboutIndex from "../components/admin/page/about/AboutIndex";
import AboutCreate from "../components/admin/page/about/AboutCreate";
import AboutEdit from "../components/admin/page/about/AboutEdit";
import AdministratorShow from "../components/admin/account/AdministratorShow";
import TechnicianIndex from "../components/admin/technician/TechnicianIndex";
import TechnicianEdit from "../components/admin/technician/TechnicianEdit";
import FollowerIndex from "../components/admin/follow/FollowerIndex";
import FollowingIndex from "../components/admin/follow/FollowingIndex";
import AdminAccount from "../components/admin/account/AdminAccount";
import RegisterIndex from "../components/user/auth/RegisterIndex";
import ContactUser from "../components/user/contact/ContactUser";
import AboutSite from "../components/user/pages/AboutSite";
import FaqsSite from "../components/user/pages/FaqsSite";
import ConceptSite from "../components/user/pages/ConceptSite";
import ActivityIndex from "../components/admin/partial/activity/ActivityIndex";
import LinkIndex from "../components/admin/partial/link/LinkIndex";
import TechnicianView from "../components/admin/technician/TechnicianView";
import TestimonialIndex from "../components/admin/page/testimonial/TestimonialIndex";
import TestimonialCreate from "../components/admin/page/testimonial/TestimonialCreate";
import TestimonialEdit from "../components/admin/page/testimonial/TestimonialEdit";
import TestimonialShow from "../components/admin/page/testimonial/TestimonialShow";
import DiplomaIndex from "../components/admin/partial/settings/diploma/DiplomaIndex";
import TechnicianProfileIndex from "../components/user/profile/TechnicianProfileIndex";
import TechnicianProfileEdit from "../components/user/profile/TechnicianProfileEdit";
import TechnicianByCity from "../components/admin/technician/by/TechnicianByCity";
import TechnicianByOccupation from "../components/admin/technician/by/TechnicianByOccupation";
import LoginIndex from "../components/user/auth/LoginIndex";

/* Legal information dans la cartalla info */
import LegalnoticeIndex from "../components/admin/info/legalnotice/LegalnoticeIndex";
import LegalnoticeCreate from "../components/admin/info/legalnotice/LegalnoticeCreate";
import LegalnoticeEdit from "../components/admin/info/legalnotice/LegalnoticeEdit";
import LegalnoticeView from "../components/admin/info/legalnotice/LegalnoticeView";
import LicenceIndex from "../components/admin/info/licence/LicenceIndex";
import LicenceCreate from "../components/admin/info/licence/LicenceCreate";
import LicenceEdit from "../components/admin/info/licence/LicenceEdit";
import LicenceView from "../components/admin/info/licence/LicenceView";
import TermsconditionsIndex from "../components/admin/info/conditions/TermsconditionsIndex";
import TermsconditionsCreate from "../components/admin/info/conditions/TermsconditionsCreate";
import TermsconditionsEdit from "../components/admin/info/conditions/TermsconditionsEdit";
import TermsconditionsView from "../components/admin/info/conditions/TermsconditionsView";
import PolicyprivacyIndex from "../components/admin/info/policyprivacy/PolicyprivacyIndex";
import PolicyprivacyCreate from "../components/admin/info/policyprivacy/PolicyprivacyCreate";
import PolicyprivacyEdit from "../components/admin/info/policyprivacy/PolicyprivacyEdit";
import PolicyprivacyView from "../components/admin/info/policyprivacy/PolicyprivacyView";
import DocumentationIndex from "../components/admin/info/documentation/DocumentationIndex";
import AdminProfileInfoEdit from "../components/admin/account/AdminProfileInfoEdit";
import ContactBookmarks from "../components/admin/contact/ContactBookmarks";
import CityActives from "../components/admin/partial/settings/city/CityActives";
import FaqByCategoryIndex from "../components/admin/faq/admin/FaqByCategoryIndex";
import TechnicianBecomeSite from "../components/user/pages/TechnicianBecomeSite";
import ColorAuditing from "../components/admin/partial/settings/color/ColorAuditing";
import AuditIndex from "../components/admin/audit/AuditIndex";
import UserTrah from "../components/admin/user/UserTrah";
import SubscriberIndex from "../components/admin/contact/SubscriberIndex";
import ProfileUserIndex from "../components/user/profile/ProfileUserIndex";
import ProfileUserEdit from "../components/user/profile/ProfileUserEdit";
import TaskIndexDatable from "../components/admin/partial/task/TaskIndexDatable";
import FaqViewSites from "../components/admin/faq/admin/FaqViewSites";
import FaqByCategoryViewSites from "../components/admin/faq/admin/FaqByCategoryViewSites";
import UserCardIndex from "../components/admin/user/UserCardIndex";
import OccupationEdit from "../components/admin/occupation/occupation/OccupationEdit";
import OccupationCreate from "../components/admin/occupation/occupation/OccupationCreate";
import IndexSite from "../components/user/IndexSite";

/* Services routes */
import OccupationsSite from "../components/user/pages/services/OccupationsSite";
import CategoryOccupationCreate from "../components/admin/occupation/categoryoccupation/CategoryOccupationCreate";
import OccupationUserSlug from "../components/user/pages/services/OccupationUserSlug";
import CategoryOccupationIndex from "../components/admin/occupation/categoryoccupation/CategoryOccupationIndex";
import CategoryOccupationEdit from "../components/admin/occupation/categoryoccupation/CategoryOccupationEdit";
import OccupationShow from "../components/admin/occupation/occupation/OccupationShow";
import OccupationShowCreate from "../components/admin/occupation/occupation/OccupationShowCreate";
import BlogIndex from "../components/admin/blog/BlogIndex";
import BlogEdit from "../components/admin/blog/BlogEdit";
import BlogCreate from "../components/admin/blog/BlogCreate";



export const routes = [

    {path: '/dashboard/', name: 'dashboard.index', component: DashboardIndex},
    {path: '/dashboard/myprofile/', name: 'admin.account', component: AdminAccount},
    {path: '/dashboard/myprofile/p/:id/edit', name: 'admin.profiles_edit', component: AdminProfileEdit},
    {path: '/dashboard/myprofile/update/', name: 'admin.edit_profile', component: AdminProfileInfoEdit},
    {path: '/dashboard/myprofile/change_password/', name: 'admin.change_password', component: AdminChangePassword,},
    {path: '/dashboard/colors/', name: 'colors.index', component: ColorIndex},
    {path: '/dashboard/colors/auditing/:color/', name: 'colors.auditing', component: ColorAuditing},
    {path: '/dashboard/countries/', name: 'countries.index', component: CountriesIndex},

    //Route administrators
    {path: '/dashboard/administrators/', name: 'administrators.index', component: AdministratorIndex},
    {path: '/dashboard/administrators/u/datatables/', name: 'administrators.datatables', component: AdministratorDatatableIndex},
    {path: '/dashboard/administrators/:id/edit/', name: 'administrators.edit', component: AdministratorEdit},

    //Route activities
    {path: '/dashboard/activities/', name: 'activities.index', component: ActivityIndex},
    //Route audits
    {path: '/dashboard/audits/', name: 'audits.index', component: AuditIndex},

    //Route links
    {path: '/dashboard/links/', name: 'links.index', component: LinkIndex},


    //Route occupations
    {path: '/dashboard/occupations/', name: 'occupations.index', component: OccupationIndex},
    {path: '/dashboard/occupations/create/', name: 'occupations.create', component: OccupationCreate},
    {path: '/dashboard/occupations/:id/edit', name: 'occupations.edit', component: OccupationEdit},
    {path: '/dashboard/occupations/v/:occupation', name: 'occupations.show_dashboard', component: OccupationShow},
    {path: '/dashboard/occupations/v/:occupation/create/', name: 'occupations.show_dashboard_create', component: OccupationShowCreate},

    {path: '/dashboard/categoryoccupations/', name: 'categoryoccupations.index', component: CategoryOccupationIndex},
    {path: '/dashboard/categoryoccupations/create', name: 'categoryoccupations.create', component: CategoryOccupationCreate},
    {path: '/dashboard/categoryoccupations/:id/edit', name: 'categoryoccupations.edit', component: CategoryOccupationEdit},
    //Route cities
    {path: '/dashboard/cities/', name: 'cities.actives', component: CityActives},
    {path: '/dashboard/cities/actives/', name: 'cities.index', component: CityIndex},

    //Route diplomas
    {path: '/dashboard/diplomas/', name: 'diplomas.index', component: DiplomaIndex},


    //Route categories FAQS
    {path: '/dashboard/category-faqs/', name: 'categoryfaqs.index', component: CategoryFaqIndex},
    //Route permissions
    {path: '/dashboard/permissions/', name: 'permissions.index', component: PermissionIndex},
    //Route roles
    {path: '/dashboard/roles/', name: 'roles.index', component: RoleIndex},

    //Route FAQS
    {path: '/dashboard/faqs/', name: 'faqs.index', component: FaqIndex},
    {path: '/dashboard/faqs/create/', name: 'faqs.create', component: FaqCreate},
    {path: '/dashboard/faqs/:id/edit/', name: 'faqs.edit', component: FaqEdit},
    {path: '/dashboard/faqs/v/sites/', name: 'faqs.dashboard_sites', component: FaqViewSites},
    {path: '/dashboard/faqs/c/:categoryfaq', name: 'faqs.catagoryfaq', component: FaqByCategoryIndex},

    //Route Blogs
    {path: '/dashboard/blogs/', name: 'blogs.index', component: BlogIndex},
    {path: '/dashboard/blogs/create', name: 'blogs.create', component: BlogCreate},
    {path: '/dashboard/blogs/:id/edit/', name: 'blogs.edit', component: BlogEdit},

    {
        path: '/dashboard/faqs/v/sites/c/:categoryfaq',
        name: 'faqs.dashboard_categoryfaq_sites',
        component: FaqByCategoryViewSites,
        //children: [
        //    {path: 'send/', name: 'messages.send', component: MessageSend,},
        //]
    },

    //Route categories
    {path: '/dashboard/categories/', name: 'categories.index', component: CategoryIndex},
    {path: '/dashboard/categories/create/', name: 'categories.create', component: CategoryCreate},
    {path: '/dashboard/categories/:id/edit/', name: 'categories.edit', component: CategoryEdit},

    //Route Abouts
    {path: '/dashboard/abouts/', name: 'abouts.index', component: AboutIndex},
    {path: '/dashboard/abouts/create/', name: 'abouts.create', component: AboutCreate},
    {path: '/dashboard/abouts/:id/edit/', name: 'abouts.edit', component: AboutEdit},


    //Route tags
    {path: '/dashboard/tags/', name: 'tags.index', component: TagIndex},
    {path: '/dashboard/tags/create/', name: 'tags.create', component: TagCreate},
    {path: '/dashboard/tags/:id/edit/', name: 'tags.edit', component: TagEdit},
    {path: '/dashboard/tags/show/:tag/', name: 'tags.view', component: TagView},

    //Route users
    {path: '/dashboard/users/', name: 'users.index', component: UserCardIndex},
    {path: '/dashboard/users/b/datatables/', name: 'users.datatables', component: UserIndex},
    {path: '/dashboard/users/t/trash/', name: 'users.trash', component: UserTrah},
    {path: '/dashboard/users/:id/edit/', name: 'users.edit', component: UserEdit},
    {path: '/dashboard/users/p/:username/', name: 'users.view', component: AdministratorShow},

    //Route followers
    {path: '/dashboard/users/p/:username/followers/', name: 'follower.view', component: FollowerIndex},
    {path: '/dashboard/users/p/:username/followings/', name: 'following.view', component: FollowingIndex},

    //Route contacts
    {path: '/dashboard/contacts/', name: 'contacts.index', component: ContactIndex},
    {path: '/dashboard/contacts/bookmarks/', name: 'contacts.bookmarks', component: ContactBookmarks},
    {path: '/dashboard/contacts/msg/:contact/', name: 'contacts.view', component: ContactMessageShow},

    //Route subscribers
    {path:'/dashboard/subscribers/',name:'subscribers.index',component:SubscriberIndex},

    {
        path: '/dashboard/messages/',
        name: 'messages.index',
        component: MessageIndex,
        //children: [
        //    {path: 'send/', name: 'messages.send', component: MessageSend,},
        //]
    },
    {path: '/dashboard/messages/msg/:message/', name: 'messages.view', component: MessageView},
    {path: '/dashboard/messages/m/send/', name: 'messages.send', component: MessageSend},


    {path: '/dashboard/notes/', name: 'notes.index', component: NoteIndex},
    {path: '/dashboard/tasks/', name: 'tasks.index', component: TaskIndex},
    {path: '/dashboard/tasks/tests/databases', name: 'tasks.database', component: TaskIndexDatable},
    {path: '/dashboard/tasks/u/:username/', name: 'tasks.view', component: TaskUser},

    //Route technicians
    {path: '/dashboard/technicians/', name: 'technicians.index', component: TechnicianIndex},
    {path: '/dashboard/technicians/:id/edit/', name: 'technicians.edit', component: TechnicianEdit},
    {path: '/dashboard/technicians/u/:technician', name: 'technicians.view', component: TechnicianView},
    {path: '/dashboard/technicians/c/:city', name: 'city.technician', component: TechnicianByCity},
    {path: '/dashboard/technicians/o/:occupation', name: 'occupation.technician', component: TechnicianByOccupation},
    {path: '/profile/t/:technician', name: 'technicians.profile', component: TechnicianProfileIndex},
    {path: '/profile/t/:technician/edit', component: TechnicianProfileEdit},

    //Route testimonials
    { path: '/dashboard/testimonials', name: 'testimonials.index', component: TestimonialIndex },
    { path: '/dashboard/testimonials/create', name: 'testimonials.create', component: TestimonialCreate },
    { path: '/dashboard/testimonials/:id/edit', name: 'testimonials.edit', component: TestimonialEdit },
    { path: '/dashboard/testimonials/tm/:testimonial', name: 'testimonials.vector', component: TestimonialShow },


    /* Legal Mention route  */
    { path: '/dashboard/documentations', name: 'documentations.index', component: DocumentationIndex },
    { path: '/dashboard/legal_notice', name: 'legal_notice.index', component: LegalnoticeIndex },
    { path: '/dashboard/legal_notice/create', name: 'legal_notice.create', component: LegalnoticeCreate },
    { path: '/dashboard/legal_notice/:id/edit', name: 'legal_notice.edit', component: LegalnoticeEdit },
    { path: '/dashboard/legal_notice/lm/:id', name: 'legal_notice.view', component: LegalnoticeView, },
    { path: '/dashboard/licence_site', name: 'licence_site.index', component: LicenceIndex },
    { path: '/dashboard/licence_site/create/', name: 'licence_site.create', component: LicenceCreate },
    { path: '/dashboard/licence_site/:id/edit', name: 'licence_site.edit', component: LicenceEdit },
    { path: '/dashboard/licence_site/lm/:licencesite', name: 'licence_site.view', component: LicenceView },
    { path: '/dashboard/policy_privacy', name: 'policy_privacy.index', component: PolicyprivacyIndex },
    { path: '/dashboard/policy_privacy/create', name: 'policy_privacy.create', component: PolicyprivacyCreate },
    { path: '/dashboard/policy_privacy/:id/edit', name: 'policy_privacy.edit', component: PolicyprivacyEdit },
    { path: '/dashboard/policy_privacy/lm/:policyprivacy', name: 'policy_privacy.view', component: PolicyprivacyView },
    { path: '/dashboard/conditions', name: 'conditions.index', component: TermsconditionsIndex },
    { path: '/dashboard/conditions/create', name: 'conditions.create', component: TermsconditionsCreate },
    { path: '/dashboard/conditions/:id/edit', name: 'conditions.edit', component: TermsconditionsEdit },
    { path: '/dashboard/conditions/lm/:condition', name: 'conditions.view', component: TermsconditionsView },


    /** Ici je recupere les route du site **/
     //Route index
    {
        path: '/',
        name: 'index.site',
        component: IndexSite,
        meta: {title: 'Technicians services to particulars'}
    },
    {
        path: '/home/',
        name: 'home',
        component: IndexSite,
        meta: {title: 'Technicians services to particulars'}
    },

    //Route pages
    {path: '/about/', name: 'about', component: AboutSite},
    {path: '/faqs', name: 'faqs', component: FaqsSite},
    {path: '/concept', name: 'concept', component: ConceptSite},

    //Route services
    {
        path: '/occupations/',
        name: 'occupations.site',
        component: OccupationsSite,
        meta: {title: 'Occupations et services à la persone : trouver un jobber facillement kazoutech'}
    },
    {
        path: '/occupations/:slug/',
        name: 'occupations.slug',
        component: OccupationUserSlug,
        meta: {title: 'Technicians services to particulars'}
    },

     //Route devenir bosseur
     {path: '/technician_become', name: 'technician_become', component: TechnicianBecomeSite},


    //Route auth
    {path: '/register/', name: 'register', component: RegisterIndex},
    {path: '/login/', name: 'login', component: LoginIndex},

    //Route contact page
    {path: '/contacts/', name: 'contact_cm', component: ContactUser},

    //Route profile user
    //{path: '/:username', name: 'profile.view', component: ProfileUserIndex},
    {path: '/profile/edit/', name: 'profile.edit', component: ProfileUserEdit},

];