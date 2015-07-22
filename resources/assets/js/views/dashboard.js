module.exports = {
  template: require('./dashboard.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null,
        contentView: null,
        filename: null,
        files: null
      },
      contents: ''
    }
  },

  filters: {
    humanize: function (value) {
      return window.Moment(value).fromNow()
    }
  },

  components: {
    navbar: require('../components/navbar')
  },

  ready: function() {
    this.fetchContent()
  },

  methods: {
    fetchContent: function() {
      this.$http.get('api/contents', function(content) {
        this.contents = content
      })
    },
  }
}