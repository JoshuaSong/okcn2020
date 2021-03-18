"use strict"; 
var routes = [
  // Index page
  {
    path: '/',
    url: '/home/home/',
    name: 'home',
  },
  // About page
  {
    path: '/shop/',
    url: '/home/pages/shop',
    name: 'shop',
  },
  // Profile page
  {
    path: '/profile/',
    url: '/home/pages/profile',
    name: 'profile',
  },
  // AD Detail
  {
    path: '/ad_detail/',
    url: '/home/pages/ad_detail',
    name: 'ad_detail',
  },
  // AD Detail user
  {
    path: '/ad_detail_user/',
    url: '/home/pages/ad_detail_user',
    name: 'ad_detail_user',
  },
  // Add Ad
  {
    path: '/add_ad/',
    url: '/home/pages/add_ad',
    name: 'add_ad',
  },
  // Pages
  {
    path: '/pages/',
    url: '/home/pages/pages',
    name: 'pages',
  },
  // walk
  {
    path: '/walk/',
    url: '/home/pages/walk',
    name: 'walk',
  },
  // Login
  {
    path: '/editProfile/',
    url: '/home/editProfile',
    name: 'editprofile',
  },
  // Sign up
  {
    path: '/signup/',
    url: '/home/signup',
    name: 'signup',
  },
  // categoriescategories
  {
    path: '/categories/:catId',
    url: '/home/categories/{{catId}}',
    name: 'categories',
  },
  // categoriescategories
  {
    path: '/categories1/:catId',
    url: '/home/categories1/{{catId}}',
    name: 'categories',
  },
  {
    path: '/categories2/:catId',
    url: '/home/categories2/{{catId}}',
    name: 'categories',
  },
  
  {
    path: '/biblebooks/:bookId',
    url: '/home/biblebooks/{{bookId}}',
    name: 'biblebooks',
  },


  {
    path: '/clist/:cid',
    url: '/home/clist2/{{cid}}',
    name: 'clist',
  },

  {
    path: '/clist3/:cid',
    url: '/home/clist3/{{cid}}',
    name: 'clist3',
  },

  
  {
    path: '/vlist/:vcid',
    url: '/home/vlist/{{vcid}}',
    name: 'vlist',
  },

  {
    path: '/tuijian/',
    url: '/home/tuijian',
    name: 'tuijian',
  },
  {
    path: '/tuijian1/',
    url: '/home/tuijian1',
    name: 'tuijian1',
  },
  {
    path: '/tuijian2/',
    url: '/home/tuijian2',
    name: 'tuijian1',
  },
  {
    path: '/guanzhu/',
    url: '/home/guanzhu',
    name: 'guanzhu',
  },
  {
    path: '/playlist/',
    url: '/home/playlist',
    name: 'playlist',
  },
  {
    path: '/mychannel/',
    url: '/home/mychannel',
    name: 'mychannel',
  },
  {
    path: '/onechannel/',
    url: '/home/onechannel',
    name: 'onechannel',
  },
  // Sellers
  {
    path: '/sellers/',
    url: '/home/pages/sellers',
    name: 'categories',
  },
  // Default route (404 page). MUST BE THE LAST
  {
    path: '(.*)',
    url: '/home/pages/404',
  },
];
