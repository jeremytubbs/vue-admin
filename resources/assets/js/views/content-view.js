module.exports = {
  template: require('./content-view.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null,
        filename: null
      },
      contents: '',
    }
  },

  components: {
    manager: require('../components/file-manager'),
    editor: require('../components/editor')
  },

  watch: {
    'params.contentId': 'fetchData'
  },

  compiled: function () {
    this.fetchData()
  },

  methods: {
    fetchData: function() {
      this.$http.get('admin/api/content/'+this.params.contentId, function(contents) {
        this.contents = contents
      })
    },
  }
}
