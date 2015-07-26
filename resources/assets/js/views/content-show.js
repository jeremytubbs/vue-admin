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
  },

  // watch: {
  //   'params.contentId': 'fetchData'
  // },

  // compiled: function () {
  //   this.fetchData()
  // },

  // methods: {
  //   fetchData: function() {
  //     this.$http.get('admin/api/content/'+this.params.contentId, function(content) {
  //       this.content = content
  //     })
  //   },
  // }
}
