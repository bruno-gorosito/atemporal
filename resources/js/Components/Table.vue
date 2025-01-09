<template>
  <table>
    <thead>
      <slot name="thead" />
    </thead>
    <tbody>
      <slot name="tbody" />
    </tbody>
  </table>
</template>



<style>
table {
  @apply w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400;
}

thead {
  @apply text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400;
}

thead th {
  @apply px-6 py-3;
}

tbody {
  @apply bg-white dark:bg-gray-800;
}

tbody tr {
  @apply border-b dark:border-gray-700 ;
}

tbody tr:last-child {
  @apply border-none;
}

tbody th {
  @apply px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white;
}

tbody td {
  @apply px-6 py-2;
}

tbody tr:nth-child(even) {
  @apply bg-gray-50 dark:bg-gray-800;
}

tbody tr:hover {
  @apply bg-gray-100 dark:bg-gray-700;
}

</style>