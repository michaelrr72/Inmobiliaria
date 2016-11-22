<?php

namespace Base;

use \Comentarios as ChildComentarios;
use \ComentariosQuery as ChildComentariosQuery;
use \Exception;
use \PDO;
use Map\ComentariosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'comentarios' table.
 *
 *
 *
 * @method     ChildComentariosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildComentariosQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 * @method     ChildComentariosQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method     ChildComentariosQuery orderByIdApartamento($order = Criteria::ASC) Order by the id_apartamento column
 *
 * @method     ChildComentariosQuery groupById() Group by the id column
 * @method     ChildComentariosQuery groupByComentario() Group by the comentario column
 * @method     ChildComentariosQuery groupByUsuario() Group by the usuario column
 * @method     ChildComentariosQuery groupByIdApartamento() Group by the id_apartamento column
 *
 * @method     ChildComentariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildComentariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildComentariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildComentariosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildComentariosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildComentariosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildComentariosQuery leftJoinApartamentos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Apartamentos relation
 * @method     ChildComentariosQuery rightJoinApartamentos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Apartamentos relation
 * @method     ChildComentariosQuery innerJoinApartamentos($relationAlias = null) Adds a INNER JOIN clause to the query using the Apartamentos relation
 *
 * @method     ChildComentariosQuery joinWithApartamentos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Apartamentos relation
 *
 * @method     ChildComentariosQuery leftJoinWithApartamentos() Adds a LEFT JOIN clause and with to the query using the Apartamentos relation
 * @method     ChildComentariosQuery rightJoinWithApartamentos() Adds a RIGHT JOIN clause and with to the query using the Apartamentos relation
 * @method     ChildComentariosQuery innerJoinWithApartamentos() Adds a INNER JOIN clause and with to the query using the Apartamentos relation
 *
 * @method     \ApartamentosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildComentarios findOne(ConnectionInterface $con = null) Return the first ChildComentarios matching the query
 * @method     ChildComentarios findOneOrCreate(ConnectionInterface $con = null) Return the first ChildComentarios matching the query, or a new ChildComentarios object populated from the query conditions when no match is found
 *
 * @method     ChildComentarios findOneById(int $id) Return the first ChildComentarios filtered by the id column
 * @method     ChildComentarios findOneByComentario(string $comentario) Return the first ChildComentarios filtered by the comentario column
 * @method     ChildComentarios findOneByUsuario(string $usuario) Return the first ChildComentarios filtered by the usuario column
 * @method     ChildComentarios findOneByIdApartamento(int $id_apartamento) Return the first ChildComentarios filtered by the id_apartamento column *

 * @method     ChildComentarios requirePk($key, ConnectionInterface $con = null) Return the ChildComentarios by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComentarios requireOne(ConnectionInterface $con = null) Return the first ChildComentarios matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComentarios requireOneById(int $id) Return the first ChildComentarios filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComentarios requireOneByComentario(string $comentario) Return the first ChildComentarios filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComentarios requireOneByUsuario(string $usuario) Return the first ChildComentarios filtered by the usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComentarios requireOneByIdApartamento(int $id_apartamento) Return the first ChildComentarios filtered by the id_apartamento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComentarios[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildComentarios objects based on current ModelCriteria
 * @method     ChildComentarios[]|ObjectCollection findById(int $id) Return ChildComentarios objects filtered by the id column
 * @method     ChildComentarios[]|ObjectCollection findByComentario(string $comentario) Return ChildComentarios objects filtered by the comentario column
 * @method     ChildComentarios[]|ObjectCollection findByUsuario(string $usuario) Return ChildComentarios objects filtered by the usuario column
 * @method     ChildComentarios[]|ObjectCollection findByIdApartamento(int $id_apartamento) Return ChildComentarios objects filtered by the id_apartamento column
 * @method     ChildComentarios[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ComentariosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ComentariosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'inmobiliaria', $modelName = '\\Comentarios', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildComentariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildComentariosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildComentariosQuery) {
            return $criteria;
        }
        $query = new ChildComentariosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildComentarios|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ComentariosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ComentariosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildComentarios A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, comentario, usuario, id_apartamento FROM comentarios WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildComentarios $obj */
            $obj = new ChildComentarios();
            $obj->hydrate($row);
            ComentariosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildComentarios|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ComentariosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ComentariosTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ComentariosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ComentariosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComentariosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
     * $query->filterByComentario('%fooValue%', Criteria::LIKE); // WHERE comentario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComentariosTableMap::COL_COMENTARIO, $comentario, $comparison);
    }

    /**
     * Filter the query on the usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
     * $query->filterByUsuario('%fooValue%', Criteria::LIKE); // WHERE usuario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByUsuario($usuario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComentariosTableMap::COL_USUARIO, $usuario, $comparison);
    }

    /**
     * Filter the query on the id_apartamento column
     *
     * Example usage:
     * <code>
     * $query->filterByIdApartamento(1234); // WHERE id_apartamento = 1234
     * $query->filterByIdApartamento(array(12, 34)); // WHERE id_apartamento IN (12, 34)
     * $query->filterByIdApartamento(array('min' => 12)); // WHERE id_apartamento > 12
     * </code>
     *
     * @param     mixed $idApartamento The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByIdApartamento($idApartamento = null, $comparison = null)
    {
        if (is_array($idApartamento)) {
            $useMinMax = false;
            if (isset($idApartamento['min'])) {
                $this->addUsingAlias(ComentariosTableMap::COL_ID_APARTAMENTO, $idApartamento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idApartamento['max'])) {
                $this->addUsingAlias(ComentariosTableMap::COL_ID_APARTAMENTO, $idApartamento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComentariosTableMap::COL_ID_APARTAMENTO, $idApartamento, $comparison);
    }

    /**
     * Filter the query by a related \Apartamentos object
     *
     * @param \Apartamentos|ObjectCollection $apartamentos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildComentariosQuery The current query, for fluid interface
     */
    public function filterByApartamentos($apartamentos, $comparison = null)
    {
        if ($apartamentos instanceof \Apartamentos) {
            return $this
                ->addUsingAlias(ComentariosTableMap::COL_ID, $apartamentos->getIdComentario(), $comparison);
        } elseif ($apartamentos instanceof ObjectCollection) {
            return $this
                ->useApartamentosQuery()
                ->filterByPrimaryKeys($apartamentos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByApartamentos() only accepts arguments of type \Apartamentos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Apartamentos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function joinApartamentos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Apartamentos');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Apartamentos');
        }

        return $this;
    }

    /**
     * Use the Apartamentos relation Apartamentos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ApartamentosQuery A secondary query class using the current class as primary query
     */
    public function useApartamentosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinApartamentos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Apartamentos', '\ApartamentosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildComentarios $comentarios Object to remove from the list of results
     *
     * @return $this|ChildComentariosQuery The current query, for fluid interface
     */
    public function prune($comentarios = null)
    {
        if ($comentarios) {
            $this->addUsingAlias(ComentariosTableMap::COL_ID, $comentarios->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the comentarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ComentariosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ComentariosTableMap::clearInstancePool();
            ComentariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ComentariosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ComentariosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ComentariosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ComentariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ComentariosQuery
