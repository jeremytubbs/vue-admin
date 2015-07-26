module.exports = {
  template: require('./content-index.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: null
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