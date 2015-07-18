module.exports = {
  template: require('./editor.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null
      },
      input: '# hello',
      preview: false
    }
  },

  filters: {
    marked: require('marked')
  },

  ready: function() {
    require('codemirror/addon/edit/continuelist')
    require('codemirror//mode/markdown/markdown')
    this.CodeMirror = require('codemirror/lib/codemirror')
    this.editor = this.CodeMirror.fromTextArea(document.getElementById('vueEditor'), {
      mode: 'markdown',
      lineNumbers: true
    })
    this.getFile();
  },

  methods: {
    showPreview: function() {
      this.preview = !this.preview
      this.input = this.editor.getValue()
    },

    getFile: function() {
      console.log(this.params.contentId)
    }
  }
}