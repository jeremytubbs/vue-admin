module.exports = {
  template: require('./content-settings.template.html'),
  props: ['params'],

  data: function () {
    return {
      params: {
      	contentId: null,
        contentView: null
      }
    }
  },

  components: {
    navbar: require('../components/navbar')
  }
}