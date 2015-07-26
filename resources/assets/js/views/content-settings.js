module.exports = {
  template: require('./content-settings.template.html'),
  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: null,
      	contentId: null
      }
    }
  },

  components: {
    navbar: require('../components/navbar')
  }
}