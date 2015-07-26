module.exports = {
  template: require('./content-settings.template.html'),
  props: ['params'],

  data: function () {
    return {
      params: {
      	contentId: null,
        currentView: null
      }
    }
  },

  components: {
    navbar: require('../components/navbar')
  }
}