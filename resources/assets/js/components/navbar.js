module.exports = {
  template: require('./navbar.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null,
        contentView: null,
        filename: null,
        files: null
      }
    }
  },
}