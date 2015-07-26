module.exports = {
  el: '#app',

  data: {
    currentView: '',
    params: {
      currentView: '',
      contentId: '',
      contents: '',
      filename: ''
    }
  },

  components: {
    'dashboard': require('./views/dashboard'),
    'content-index': require('./views/content-index'),
    'content-create': require('./views/content-create'),
    'content-show': require('./views/content-show'),
    'content-settings': require('./views/content-settings'),
    'content-editor': require('./views/content-editor')
  },

  watch: {
    'params.contentId': 'fetchData'
  },

  // compiled: function () {
  //   if (this.params.contentId.length) {
  //     this.fetchData()
  //   }
  // },

  methods: {
    fetchData: function() {
      if (this.params.contentId.length) {
        this.$http.get('admin/api/content/'+this.params.contentId, function(contents) {
          console.log(contents)
          this.params.contents = contents
        })
      }
      if (! this.params.contentId.length) {
        this.params.contents = ''
      }
    }
  }
}
