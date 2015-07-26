module.exports = {
  template: require('./content-show.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: '',
        contentId: '',
        contents: '',
        filename: ''
      },
    }
  },

  components: {
    navbar: require('../components/navbar'),
    manager: require('../components/file-manager')
  }
}
