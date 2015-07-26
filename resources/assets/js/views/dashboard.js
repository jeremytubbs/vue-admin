module.exports = {
  template: require('./dashboard.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: null
      }
    }
  },

  components: {
    navbar: require('../components/navbar')
  },

}